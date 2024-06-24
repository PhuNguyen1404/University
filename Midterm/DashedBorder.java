package Midterm;
import java.awt.*;

public class DashedBorder implements Border {
    private Color color;

    public DashedBorder(Color color) {
        this.color = color;
    }

    public void draw() {
        System.out.println("Dashed border with color " + color.toString());
    }
}
