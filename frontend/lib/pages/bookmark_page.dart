import 'package:flutter/material.dart';
import 'package:perpusapi/models/book_model.dart';
import 'package:perpusapi/pages/pinjam_buku.dart';

class BookmarkPage extends StatelessWidget {
  final List<Book> bookmarkedBooks;

  BookmarkPage({required this.bookmarkedBooks});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Bookmarked Books'),
        automaticallyImplyLeading: true, // This will show the back button
      ),
      body: ListView.builder(
        itemCount: bookmarkedBooks.length,
        itemBuilder: (context, index) {
          Book book = bookmarkedBooks[index];
          return Card(
            elevation: 4,
            margin: EdgeInsets.symmetric(vertical: 8, horizontal: 16),
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(12),
            ),
            child: ListTile(
              contentPadding: EdgeInsets.all(12),
              leading: _buildBookImage(book),
              title: Text(
                book.judul,
                style: TextStyle(
                  fontSize: 18,
                  fontWeight: FontWeight.bold,
                ),
              ),
              subtitle: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  SizedBox(height: 4),
                  Text(
                    'Author: ${book.pengarang}',
                    style: TextStyle(fontSize: 14),
                  ),
                  SizedBox(height: 4),
                  Text(
                    'Publisher: ${book.penerbit}',
                    style: TextStyle(fontSize: 14),
                  ),
                  SizedBox(height: 4),
                  Text(
                    'Stock: ${book.jumlahStok}',
                    style: TextStyle(fontSize: 14),
                  ),
                ],
              ),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(
                    builder: (context) => BorrowBookPage(
                      token: 'your_token_here',
                      book: book,
                    ),
                  ),
                );
              },
            ),
          );
        },
      ),
    );
  }

  Widget _buildBookImage(Book book) {
    String baseUrl = "http://10.0.2.2:8000/storage/";
    String imageUrl = baseUrl + book.gambar;

    return ClipRRect(
      borderRadius: BorderRadius.circular(8),
      child: Image.network(
        imageUrl,
        width: 80,
        height: 120,
        fit: BoxFit.cover,
        errorBuilder: (context, error, stackTrace) {
          return Icon(Icons.error_outline, size: 80);
        },
      ),
    );
  }
}
