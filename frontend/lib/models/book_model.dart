class Book {
  final int id;
  final int bookCategoryId;
  final String judul;
  final String pengarang;
  final String penerbit;
  final String lokasi;
  final int jumlahStok;
  final String gambar;

  Book({
    required this.id,
    required this.bookCategoryId,
    required this.judul,
    required this.pengarang,
    required this.penerbit,
    required this.lokasi,
    required this.jumlahStok,
    required this.gambar,
  });

  factory Book.fromJson(Map<String, dynamic> json) {
    return Book(
      id: json['id'] ?? 0,
      bookCategoryId: json['book_category_id'] ?? 0,
      judul: json['judul'] ?? "",
      pengarang: json['pengarang'] ?? "",
      penerbit: json['penerbit'] ?? "",
      lokasi: json['lokasi'] ?? "",
      jumlahStok: json['jumlah_stok'] ?? 0,
      gambar: json['gambar'] ?? "",
    );
  }


}
