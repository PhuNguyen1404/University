package Midterm;

public class Circle implements Shape {
    private int radius;
    private Border border;
    private Background background;

    public Circle(int radius, Border border, Background background) {
        this.radius = radius;
        this.border = border;
        this.background = background;
    }

    public void draw() {
        System.out.println("Circle with radius " + radius);
        border.draw();
        background.draw();
    }

    public void setBorder(Border border) {
        this.border = border;
    }

    public void setBackground(Background background) {
        this.background = background;
    }
}

