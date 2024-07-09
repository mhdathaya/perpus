import 'package:dio/dio.dart';
import 'package:perpusapi/models/category_model.dart';

class CategoryService {
  final Dio _dio = Dio();
  final String _baseUrl =
      "http://10.0.2.2:8000/api"; // Sesuaikan dengan base URL API Anda

  Future<List<Category>> getCategories(String token) async {
    try {
      final response = await _dio.get(
        "$_baseUrl/book-category",
        options: Options(
          headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer $token',
          },
        ),
      );

      if (response.statusCode == 200) {
        List<Category> categories = (response.data['data'] as List)
            .map((categoryJson) => Category.fromJson(categoryJson))
            .toList();
        return categories;
      } else {
        throw Exception(
            'Failed to load categories. Status code: ${response.statusCode}');
      }
    } catch (error) {
      throw Exception('Failed to load categories: $error');
    }
  }

  Future<Category> getCategoryById(String token, int categoryId) async {
    try {
      final response = await _dio.get(
        "$_baseUrl/book-category/$categoryId",
        options: Options(
          headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer $token',
          },
        ),
      );

      if (response.statusCode == 200) {
        Category category = Category.fromJson(response.data['data']);
        return category;
      } else {
        throw Exception(
            'Failed to load category. Status code: ${response.statusCode}');
      }
    } catch (error) {
      throw Exception('Failed to load category: $error');
    }
  }
}
