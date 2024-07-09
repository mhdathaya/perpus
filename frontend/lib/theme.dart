import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

enum ThemeType { Light, Dark }

class ThemePreferences {
  static const _themeKey = 'theme';

  Future<ThemeType> getTheme() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    final themeIndex = prefs.getInt(_themeKey) ?? 0;
    return ThemeType.values[themeIndex];
  }

  Future<void> setTheme(ThemeType themeType) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    await prefs.setInt(_themeKey, themeType.index);
  }

  ThemeData getThemeData(ThemeType themeType) {
    switch (themeType) {
      case ThemeType.Light:
        return ThemeData.light();
      case ThemeType.Dark:
        return ThemeData.dark();
      default:
        return ThemeData.light();
    }
  }
}
