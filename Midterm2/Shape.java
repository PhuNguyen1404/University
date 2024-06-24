package Midterm2;

public abstract class Shape {
    protected String color;
    protected int thickness;

    public Shape(String color, int thickness) {
        this.color = color;
        this.thickness = thickness;
    }

    public abstract void draw();

    public String getInfo() {
        return "Color: " + color + ", Thickness: " + thickness;
    }
}