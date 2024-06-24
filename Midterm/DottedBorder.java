package Midterm;
import java.awt.*;

public class DottedBorder implements Border {
    private Color color;
    public DottedBorder(Color color) {
        this.color = color;
    }

    public void draw() {
        System.out.println("Dotted border with color " + color.toString());
    }
}

