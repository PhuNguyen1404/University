package Midterm2;

public class Triangle extends Shape {
    private int base;
    private int height;

    public Triangle(String color, int thickness, int base, int height) {
        super(color, thickness);
        this.base = base;
        this.height = height;
    }

    public void draw() {
        System.out.println("Drawing triangle with base " + base + " and height " + height);
    }
}
