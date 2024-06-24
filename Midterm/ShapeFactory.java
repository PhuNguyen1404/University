package Midterm;

public class ShapeFactory  {
    public static Shape createShape(String shapeType, int width, int height, Border border, Background background) {
        if (shapeType.equalsIgnoreCase("rectangle")) {
            return new Rectangle(width, height, border, background);
        } else if (shapeType.equalsIgnoreCase("circle")) {
            return new Circle(width, border, background); // Circle only needs radius, not width and height
        } else if (shapeType.equalsIgnoreCase("square")) {
            return new Square(width, border, background); // Square only needs side, not width and height
        } else {
            return null;
        }
    }
}
