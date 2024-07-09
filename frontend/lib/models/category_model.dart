class Category {
  final int id;
  final String name;
  final String createdAt;
  final String updatedAt;
  final String image;

  Category({
    required this.id,
    required this.name,
    required this.createdAt,
    required this.updatedAt,
    required this.image,
  });

  factory Category.fromJson(Map<String, dynamic> json) {
    return Category(
      id: json['id'] ?? 0,
      name: json['name'] ?? "",
      createdAt: json['created_at'],
      updatedAt: json['updated_at'],
      image: json['image'] ?? "",
    );
  }
}
