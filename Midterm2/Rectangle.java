package Midterm2;

public class Rectangle extends Shape {
    private int width;
    private int height;

    public Rectangle(String color, int thickness, int width, int height) {
        super(color, thickness);
        this.width = width;
        this.height = height;
    }

    public void draw() {
        System.out.println("Drawing rectangle with width " + width + " and height " + height);
    }
}
