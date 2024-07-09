import 'package:flutter/material.dart';
import 'package:perpusapi/models/book_model.dart';
import 'package:perpusapi/models/category_model.dart';
import 'package:perpusapi/pages/bookmark_page.dart';
import 'package:perpusapi/pages/profile_pages.dart';
import 'package:perpusapi/services/book_service.dart';
import 'package:perpusapi/services/category_service.dart';
import 'package:shared_preferences/shared_preferences.dart';

class BookListPage extends StatefulWidget {
  final String token;

  BookListPage({required this.token});

  @override
  _BookListPageState createState() => _BookListPageState();
}

class _BookListPageState extends State<BookListPage> {
  final BookService _bookService = BookService();
  final CategoryService _categoryService = CategoryService();
  late Future<List<Book>> _futureBooks;
  late Future<List<Category>> _futureCategories;
  List<Book> _books = [];
  List<Book> _searchResults = [];
  Set<int> _bookmarks = {};
  late SharedPreferences _prefs;
  bool _isLoading = false;
  int _selectedCategoryId = 0; // State to store the selected category ID

  @override
  void initState() {
    super.initState();
    _loadData();
  }

  void _loadData() async {
    setState(() {
      _isLoading = true;
    });

    try {
      _prefs = await SharedPreferences.getInstance();
      Set<int> bookmarks = _prefs
              .getStringList('bookmarks')
              ?.map((id) => int.parse(id))
              .toSet() ??
          {};
      setState(() {
        _bookmarks = bookmarks;
      });

      _futureBooks = _bookService.getBooks(widget.token);
      _futureBooks.then((books) {
        setState(() {
          _books = books;
          _isLoading = false;
        });
      }).catchError((error) {
        setState(() {
          _isLoading = false;
        });
        print('Error fetching books: $error');
      });

      _futureCategories = _categoryService.getCategories(widget.token);
    } catch (error) {
      setState(() {
        _isLoading = false;
      });
      print('Error initializing app: $error');
    }
  }

  void _savePreferences() async {
    await _prefs.setStringList(
        'bookmarks', _bookmarks.map((id) => id.toString()).toList());
  }

  void _logout() {
    Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => ProfilePage(
          onLogout: () {},
        ),
      ),
    );
  }

  void _toggleBookmark(int bookId) {
    setState(() {
      if (_bookmarks.contains(bookId)) {
        _bookmarks.remove(bookId);
      } else {
        _bookmarks.add(bookId);
      }
      _savePreferences();
    });
  }

  bool _isBookmarked(int bookId) {
    return _bookmarks.contains(bookId);
  }

  void _navigateToBookmarks() {
    List<Book> bookmarkedBooks =
        _books.where((book) => _bookmarks.contains(book.id)).toList();
    Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => BookmarkPage(bookmarkedBooks: bookmarkedBooks),
      ),
    );
  }

  void _onCategorySelected(int categoryId) {
    setState(() {
      _selectedCategoryId = categoryId;
      _searchResults =
          _books.where((book) => book.bookCategoryId == categoryId).toList();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Hello!'),
        automaticallyImplyLeading: false, // Remove the back button
        actions: [
          IconButton(
            icon: Icon(Icons.bookmark),
            onPressed: _navigateToBookmarks,
          ),
        ],
      ),
      body: _isLoading
          ? Center(
              child: CircularProgressIndicator(),
            )
          : SingleChildScrollView(
              padding: EdgeInsets.all(16),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  TextField(
                    controller: TextEditingController(),
                    decoration: InputDecoration(
                      hintText: 'Search by Book title, Author, etc',
                      prefixIcon: Icon(Icons.search),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.circular(8),
                      ),
                    ),
                    onChanged: (value) {
                      setState(() {
                        _searchResults = _books
                            .where((book) => book.judul
                                .toLowerCase()
                                .contains(value.toLowerCase()))
                            .toList();
                      });
                    },
                  ),
                  SizedBox(height: 16),
                  SectionTitle(title: 'Top Available for you!'),
                  SizedBox(height: 8),
                  BookCarousel(
                    books: _books,
                    onBookmarkToggle: _toggleBookmark,
                    isBookmarked: _isBookmarked,
                  ),
                  SizedBox(height: 16),
                  SectionTitle(title: 'Pick from Popular Categories'),
                  SizedBox(height: 8),
                  FutureBuilder<List<Category>>(
                    future: _futureCategories,
                    builder: (context, snapshot) {
                      if (snapshot.connectionState == ConnectionState.waiting) {
                        return Center(child: CircularProgressIndicator());
                      } else if (snapshot.hasError) {
                        return Text(
                            'Error loading categories: ${snapshot.error}');
                      } else if (!snapshot.hasData || snapshot.data!.isEmpty) {
                        return Text('No categories available.');
                      } else {
                        List<Category> categories = snapshot.data!;
                        return GenreList(
                          categories: categories,
                          onCategorySelected: _onCategorySelected,
                        );
                      }
                    },
                  ),
                  SizedBox(height: 16),
                  SectionTitle(title: 'Your Recently Borrowed Books'),
                  SizedBox(height: 8),
                  BookList(
                    books: _selectedCategoryId == 0
                        ? _books
                        : _searchResults.isEmpty
                            ? []
                            : _searchResults,
                    onBookmarkToggle: _toggleBookmark,
                    isBookmarked: _isBookmarked,
                  ),
                ],
              ),
            ),
      bottomNavigationBar: BottomNavigationBar(
        items: const <BottomNavigationBarItem>[
          BottomNavigationBarItem(
            icon: Icon(Icons.home),
            label: 'Home',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person),
            label: 'Profile',
          ),
        ],
        currentIndex: 0,
        selectedItemColor: Color.fromARGB(255, 15, 16, 16),
        onTap: (index) {
          setState(() {
            switch (index) {
              case 0:
                // Navigate to home page if pressed
                break;
              case 1:
                // Perform logout function if profile is pressed
                _logout();
                break;
            }
          });
        },
      ),
    );
  }
}

class SectionTitle extends StatelessWidget {
  final String title;

  SectionTitle({required this.title});

  @override
  Widget build(BuildContext context) {
    return Text(
      title,
      style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
    );
  }
}

class BookCarousel extends StatelessWidget {
  final List<Book> books;
  final Function(int) onBookmarkToggle;
  final bool Function(int) isBookmarked;

  BookCarousel(
      {required this.books,
      required this.onBookmarkToggle,
      required this.isBookmarked});

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 200,
      child: ListView.builder(
        scrollDirection: Axis.horizontal,
        itemCount: books.length,
        itemBuilder: (context, index) {
          Book book = books[index];
          return GestureDetector(
            onTap: () {
              // Handle book tap
            },
            child: Container(
              margin: EdgeInsets.symmetric(horizontal: 8),
              width: 120,
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Expanded(
                    child: ClipRRect(
                      borderRadius: BorderRadius.circular(8),
                      child: Image.network(
                        'http://10.0.2.2:8000/storage/${book.gambar}',
                        fit: BoxFit.cover,
                        width: double.infinity,
                        errorBuilder: (context, error, stackTrace) {
                          return Icon(Icons.error_outline, size: 80);
                        },
                      ),
                    ),
                  ),
                  SizedBox(height: 8),
                  Text(
                    book.judul,
                    style: TextStyle(
                      fontSize: 14,
                      fontWeight: FontWeight.bold,
                    ),
                    maxLines: 1,
                    overflow: TextOverflow.ellipsis,
                  ),
                  IconButton(
                    icon: Icon(
                      isBookmarked(book.id)
                          ? Icons.bookmark
                          : Icons.bookmark_border,
                      color: isBookmarked(book.id) ? Colors.blue : Colors.grey,
                    ),
                    onPressed: () => onBookmarkToggle(book.id),
                  ),
                ],
              ),
            ),
          );
        },
      ),
    );
  }
}

class GenreList extends StatelessWidget {
  final List<Category> categories;
  final Function(int) onCategorySelected;

  GenreList({required this.categories, required this.onCategorySelected});

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 50,
      child: ListView.builder(
        scrollDirection: Axis.horizontal,
        itemCount: categories.length,
        itemBuilder: (context, index) {
          Category category = categories[index];
          return GestureDetector(
            onTap: () {
              onCategorySelected(category.id);
            },
            child: Container(
              padding: EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              margin: EdgeInsets.only(right: 8),
              decoration: BoxDecoration(
                color: category.id == 1
                    ? Colors.blue.withOpacity(0.3)
                    : Colors.transparent,
                borderRadius: BorderRadius.circular(20),
              ),
              child: Center(
                child: Text(
                  category.name,
                  style: TextStyle(
                    color: category.id == 1 ? Colors.blue : Colors.black,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
            ),
          );
        },
      ),
    );
  }
}

class BookList extends StatelessWidget {
  final List<Book> books;
  final Function(int) onBookmarkToggle;
  final bool Function(int) isBookmarked;

  BookList(
      {required this.books,
      required this.onBookmarkToggle,
      required this.isBookmarked});

  @override
  Widget build(BuildContext context) {
    return Column(
      children: books.map((book) {
        return ListTile(
          onTap: () {
            // Handle book tap
          },
          leading: ClipRRect(
            borderRadius: BorderRadius.circular(8),
            child: Image.network(
              'http://10.0.2.2:8000/storage/${book.gambar}',
              width: 50,
              height: 70,
              fit: BoxFit.cover,
              errorBuilder: (context, error, stackTrace) {
                return Icon(Icons.error_outline);
              },
            ),
          ),
          title: Text(book.judul),
          subtitle: Text(book.pengarang),
          trailing: IconButton(
            icon: Icon(
              isBookmarked(book.id) ? Icons.bookmark : Icons.bookmark_border,
              color: isBookmarked(book.id) ? Colors.blue : Colors.grey,
            ),
            onPressed: () => onBookmarkToggle(book.id),
          ),
        );
      }).toList(),
    );
  }
}
