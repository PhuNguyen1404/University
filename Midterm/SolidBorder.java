package Midterm;
import java.awt.*;

public class SolidBorder implements Border {
    private Color color;

    public SolidBorder(Color color) {
        this.color = color;
    }

    public void draw() {
        System.out.println("Solid border with color " + color.toString());
    }
}
