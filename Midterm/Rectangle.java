package Midterm;

public class Rectangle implements Shape {
    private int width;
    private int height;
    private Border border;
    private Background background;

    public Rectangle(int width, int height, Border border, Background background) {
        this.width = width;
        this.height = height;
        this.border = border;
        this.background = background;
    }

    public void draw() {
        System.out.println("Rectangle with width " + width + " and height " + height);
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