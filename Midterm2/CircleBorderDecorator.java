package Midterm2;

public class CircleBorderDecorator extends BorderDecorator { 
    public CircleBorderDecorator(Shape shape) { 
        super(shape); 
    }

    public void draw() {
        shape.draw();
        System.out.println("Adding border to circle");
    }

    public String getBorderInfo() {
        return "Circle border";
    }

}

