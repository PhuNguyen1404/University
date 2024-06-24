package Midterm2;

public class Circle extends Shape {
    private int radius;

    public Circle(String color, int thickness, int radius) {
        super(color, thickness);
        this.radius = radius;
    }

    public void draw() {
        System.out.println("Drawing circle with radius " + radius);
    }
}
