import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:perpusapi/pages/login_pages.dart';

class SettingsPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Pengaturan'),
      ),
      body: Padding(
        padding: EdgeInsets.all(20.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              'Pengaturan Umum',
              style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 10),
            Divider(),
            ListTile(
              title: Text('Tema'),
              leading: Icon(Icons.color_lens),
              onTap: () {
                _showThemeDialog(
                    context); // Panggil fungsi untuk menampilkan dialog pilihan tema
              },
            ),
            Divider(),
            SizedBox(height: 20),
            Text(
              'Akun',
              style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 10),
            Divider(),
            ListTile(
              title: Text('Keluar'),
              leading: Icon(Icons.exit_to_app),
              onTap: () {
                // Tampilkan dialog konfirmasi sebelum keluar
                showDialog(
                  context: context,
                  builder: (BuildContext context) {
                    return AlertDialog(
                      title: Text('Konfirmasi Keluar'),
                      content: Text('Anda yakin ingin keluar dari akun?'),
                      actions: <Widget>[
                        TextButton(
                          child: Text('Batal'),
                          onPressed: () {
                            Navigator.of(context).pop();
                          },
                        ),
                        TextButton(
                          child: Text('Keluar'),
                          onPressed: () {
                            // Panggil fungsi untuk logout atau navigasi ke halaman login
                            Navigator.pushAndRemoveUntil(
                              context,
                              PageRouteBuilder(
                                transitionDuration: Duration(milliseconds: 500),
                                transitionsBuilder: (BuildContext context,
                                    Animation<double> animation,
                                    Animation<double> secondaryAnimation,
                                    Widget child) {
                                  return SlideTransition(
                                    position: Tween<Offset>(
                                      begin: const Offset(1.0, 0.0),
                                      end: Offset.zero,
                                    ).animate(animation),
                                    child: child,
                                  );
                                },
                                pageBuilder: (BuildContext context,
                                    Animation<double> animation,
                                    Animation<double> secondaryAnimation) {
                                  return LoginPage();
                                },
                              ),
                              (Route<dynamic> route) => false,
                            );
                          },
                        ),
                      ],
                    );
                  },
                );
              },
            ),
          ],
        ),
      ),
    );
  }

  void _showThemeDialog(BuildContext context) {
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: Text('Pilih Tema'),
          content: Column(
            mainAxisSize: MainAxisSize.min,
            children: <Widget>[
              ListTile(
                title: Text('Tema Terang'),
                onTap: () {
                  _applyTheme(ThemeData.light());
                  Navigator.of(context).pop();
                },
              ),
              ListTile(
                title: Text('Tema Gelap'),
                onTap: () {
                  _applyTheme(ThemeData.dark());
                  Navigator.of(context).pop();
                },
              ),
            ],
          ),
        );
      },
    );
  }

  void _applyTheme(ThemeData theme) async {
    // Simpan preferensi tema pengguna menggunakan shared preferences
    SharedPreferences prefs = await SharedPreferences.getInstance();
    prefs.setBool('isDarkMode', theme == ThemeData.dark());

    // Terapkan tema baru ke dalam aplikasi
    runApp(MyApp(theme: theme));
  }
}

class MyApp extends StatelessWidget {
  final ThemeData theme;

  MyApp({required this.theme});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'PerpusApp',
      theme:
          theme, // Gunakan tema yang diterima dari SettingsPage atau default tema
      home: LoginPage(), // Atur halaman beranda aplikasi
    );
  }
}
