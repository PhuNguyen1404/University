package Midterm;

public class Square implements Shape {
    private int side;
    private Border border;
    private Background background;

    public Square(int side, Border border, Background background) {
        this.side = side;
        this.border = border;
        this.background = background;
    }

    public void draw() {
        System.out.println("Square with side " + side);
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
