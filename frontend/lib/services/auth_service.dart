import 'package:dio/dio.dart';

class AuthService {
  final Dio _dio = Dio();
  final String baseUrl = "http://10.0.2.2:8000/api"; // Ganti dengan base URL API kamu

  Future<String> login(String email, String password) async {
    try {
      final response = await _dio.post(
        '$baseUrl/login',
        data: {
          'email': email,
          'password': password,
        },
      );
      if (response.statusCode == 200) {
        return response.data['token']; // Ganti sesuai dengan struktur respons API kamu
      } else {
        throw Exception('Failed to login');
      }
    } catch (e) {
      throw Exception('Failed to login: $e');
    }
  }

  Future<String> register(String email, String password, String name, String nomorTelepon) async {
    try {
      final response = await _dio.post(
        '$baseUrl/register-peminjam',
        data: {
          'email': email,
          'password': password,
          'name': name,
          'nomor_telepon': nomorTelepon,
        },
      );
      if (response.statusCode == 200) { // Ubah status code sesuai dengan kebutuhan Anda
        return 'User successfully registered'; // Sesuaikan dengan respons API Anda
      } else {
        throw Exception('Failed to register: ${response.statusCode}');
      }
    } catch (e) {
      throw Exception('Failed to register: $e');
    }
  }
}
