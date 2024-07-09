import 'package:dio/dio.dart';
import 'package:perpusapi/models/book_model.dart'; // Adjust the path according to your project structure

class BookService {
  final Dio _dio = Dio();
  final String _baseUrl =
      "http://10.0.2.2:8000/api"; // Replace with your API base URL

  Future<List<Book>> getBooks(String token) async {
    try {
      final response = await _dio.get(
        "$_baseUrl/book",
        options: Options(
          headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer $token',
          },
        ),
      );

      if (response.statusCode == 200) {
        List<Book> books = (response.data['data'] as List)
            .map((bookJson) => Book.fromJson(bookJson))
            .toList();
        return books;
      } else {
        throw Exception('Failed to load books');
      }
    } catch (error) {
      throw Exception('Failed to load books: $error');
    }
  }

  getBooksByCategory(String token, int categoryId) {}
}
