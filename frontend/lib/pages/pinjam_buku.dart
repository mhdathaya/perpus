import 'package:flutter/material.dart';
import 'package:intl/intl.dart'; // Untuk formatting tanggal
import 'package:perpusapi/models/book_model.dart'; // Sesuaikan path sesuai struktur proyek Anda
import 'package:perpusapi/services/pinjaman_service.dart'; // Sesuaikan path sesuai struktur proyek Anda

class BorrowBookPage extends StatefulWidget {
  final String token;
  final Book book;

  BorrowBookPage({required this.token, required this.book});

  @override
  _BorrowBookPageState createState() => _BorrowBookPageState();
}

class _BorrowBookPageState extends State<BorrowBookPage> {
  final BorrowBookService _borrowBookService = BorrowBookService();
  DateTime? _borrowDate;
  DateTime? _returnDate;
  bool _isLoading = false;
  String? _errorMessage;

  Future<void> _borrowBook() async {
    setState(() {
      _isLoading = true;
      _errorMessage = null;
    });

    try {
      bool success = await _borrowBookService.borrowBook(
        widget.token,
        widget.book.id,
        _borrowDate!,
        _returnDate!,
      );

      if (success) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text('Book borrowed successfully!')),
        );
        Navigator.of(context)
            .pop(true); // Kirim true sebagai hasil navigasi kembali
      } else {
        setState(() {
          _errorMessage = 'Failed to borrow book.';
        });
      }
    } catch (error) {
      setState(() {
        _errorMessage = 'Failed to borrow book: $error';
      });
    } finally {
      setState(() {
        _isLoading = false;
      });
    }
  }

  Future<void> _confirmBorrow() async {
    if (_borrowDate == null || _returnDate == null) {
      setState(() {
        _errorMessage = 'Please select both borrow and return dates.';
      });
      return;
    }

    // Menampilkan dialog konfirmasi
    bool confirm = await showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: Text('Confirm Borrow'),
          content: Text('Are you sure you want to borrow this book?'),
          actions: <Widget>[
            TextButton(
              child: Text('Cancel'),
              onPressed: () {
                Navigator.of(context).pop(false);
              },
            ),
            TextButton(
              child: Text('Confirm'),
              onPressed: () {
                Navigator.of(context).pop(true);
              },
            ),
          ],
        );
      },
    );

    if (confirm) {
      await _borrowBook();
    }
  }

  void _pickDate(BuildContext context, bool isBorrowDate) async {
    DateTime? picked = await showDatePicker(
      context: context,
      initialDate: DateTime.now(),
      firstDate: DateTime(2022),
      lastDate: DateTime(2030),
    );
    if (picked != null) {
      setState(() {
        if (isBorrowDate) {
          _borrowDate = picked;
        } else {
          _returnDate = picked;
        }
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Borrow Book'),
      ),
      body: SingleChildScrollView(
        padding: EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Center(
              child: Container(
                padding: EdgeInsets.all(8.0),
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(10.0),
                  border: Border.all(color: Colors.grey),
                ),
                child: _buildBookImage(widget.book),
              ),
            ),
            SizedBox(height: 20),
            Text(
              widget.book.judul,
              style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
              textAlign: TextAlign.center,
            ),
            SizedBox(height: 10),
            Text(
              'Author: ${widget.book.pengarang}',
              style: TextStyle(fontSize: 18),
              textAlign: TextAlign.center,
            ),
            SizedBox(height: 10),
            Text(
              'Publisher: ${widget.book.penerbit}',
              style: TextStyle(fontSize: 18),
              textAlign: TextAlign.center,
            ),
            SizedBox(height: 10),
            Text(
              'Location: ${widget.book.lokasi}',
              style: TextStyle(fontSize: 18),
              textAlign: TextAlign.center,
            ),
            SizedBox(height: 10),
            Text(
              'Stock: ${widget.book.jumlahStok}',
              style: TextStyle(fontSize: 18),
              textAlign: TextAlign.center,
            ),
            SizedBox(height: 20),
            ListTile(
              title: Text('Borrow Date:'),
              subtitle: Text(_borrowDate == null
                  ? 'Select a date'
                  : DateFormat('yyyy-MM-dd').format(_borrowDate!)),
              trailing: Icon(Icons.calendar_today),
              onTap: () => _pickDate(context, true),
            ),
            ListTile(
              title: Text('Return Date:'),
              subtitle: Text(_returnDate == null
                  ? 'Select a date'
                  : DateFormat('yyyy-MM-dd').format(_returnDate!)),
              trailing: Icon(Icons.calendar_today),
              onTap: () => _pickDate(context, false),
            ),
            SizedBox(height: 20),
            if (_errorMessage != null) ...[
              Text(
                _errorMessage!,
                style: TextStyle(color: Colors.red, fontSize: 16),
                textAlign: TextAlign.center,
              ),
              SizedBox(height: 10),
            ],
            _isLoading
                ? Center(child: CircularProgressIndicator())
                : ElevatedButton(
                    onPressed: _confirmBorrow,
                    child: Text('Borrow'),
                  ),
          ],
        ),
      ),
    );
  }

  Widget _buildBookImage(Book book) {
    String baseUrl = "http://10.0.2.2:8000/storage/";
    String imageUrl = baseUrl + book.gambar;

    return Image.network(
      imageUrl,
      width: 200,
      height: 300,
      fit: BoxFit.cover,
      errorBuilder: (context, error, stackTrace) {
        return Icon(Icons.error_outline, size: 100, color: Colors.grey);
      },
    );
  }
}
