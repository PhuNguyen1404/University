package Midterm;
import java.awt.*;

public class Main {
    public static void main(String[] args) {

        Border border = new DottedBorder(Color.BLACK);
        Background background = new SolidBackground(Color.WHITE);
        Shape rectangle = ShapeFactory.createShape("rectangle", 10, 20, border, background);
        rectangle.draw();

        border = new DashedBorder(Color.RED);
        background = new GradientBackground(Color.BLUE, Color.GREEN);
        Shape circle = ShapeFactory.createShape("circle", 5, 5, border, background);
        circle.draw();

        border = new SolidBorder(Color.YELLOW);
        background = new SolidBackground(Color.GRAY);
        Shape square = ShapeFactory.createShape("square", 10, 10, border, background);
        square.draw();
    }
}
