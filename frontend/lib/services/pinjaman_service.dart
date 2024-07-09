import 'package:dio/dio.dart';

class BorrowBookService {
  final Dio _dio = Dio();

  Future<bool> borrowBook(String token, int bookId, DateTime tanggalPinjam, DateTime tanggalKembali) async {
    try {
      Response response = await _dio.post(
        'http://10.0.2.2:8000/api/pinjaman',
        data: {
          'book_id': bookId,
          'tanggal_pinjam': tanggalPinjam.toIso8601String(),
          'tanggal_kembali': tanggalKembali.toIso8601String(),
        },
        options: Options(
          headers: {
            'Authorization': 'Bearer $token',
          },
        ),
      );
      return response.statusCode == 200;
    } catch (e) {
      print('Error borrowing book: $e');
      return false;
    }
  }
}
