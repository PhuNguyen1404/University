package Midterm2;

public class RectangleBorderDecorator extends BorderDecorator {
    public RectangleBorderDecorator(Shape shape) {
        super(shape);
    }

    public void draw() {
        shape.draw(); System.out.println("Adding border to rectangle"); }

    public String getBorderInfo() {
        return "Rectangle border";
    }

}
