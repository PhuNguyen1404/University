package Midterm2;

public abstract class BorderDecorator extends Shape {
    protected Shape shape;

    public BorderDecorator(Shape shape) {
        super(shape);
    }

    public String getInfo() {
        return shape.getInfo() + ", Border: " + getBorderInfo();
    }

    public abstract String getBorderInfo();
}
