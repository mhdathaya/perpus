import 'package:flutter/material.dart';
import 'package:perpusapi/pages/settings_page.dart'; // Sesuaikan dengan struktur proyek Anda

class ProfilePage extends StatelessWidget {
  final VoidCallback onLogout;
  final String? name;

  ProfilePage({required this.onLogout, this.name});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Profile'),
        actions: [],
      ),
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: <Widget>[
            DrawerHeader(
              decoration: BoxDecoration(
                color: Colors.blue,
              ),
              child: Text(
                'Menu',
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 24,
                ),
              ),
            ),
            ListTile(
              title: Text('Pengaturan'),
              leading: Icon(Icons.settings),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(
                    builder: (context) => SettingsPage(),
                  ),
                );
              },
            ),
            ListTile(
              title: Text('Tentang Kami'),
              leading: Icon(Icons.info),
              onTap: () {
                // Tambahkan fungsi navigasi ke halaman informasi tambahan
              },
            ),
          ],
        ),
      ),
    );
  }
}
