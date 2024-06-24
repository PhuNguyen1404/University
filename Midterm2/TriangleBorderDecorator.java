package Midterm2;

public class TriangleBorderDecorator extends BorderDecorator { 
    public TriangleBorderDecorator(Shape shape) { 
        super(shape); 
    }

    public void draw() {
        shape.draw();
        System.out.println("Adding border to triangle");
    }

    public String getBorderInfo() {
        return "Triangle border";
    }

}