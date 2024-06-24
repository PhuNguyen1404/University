package Midterm;
import java.awt.*;

public class SolidBackground implements Background {
    private Color color;

    public SolidBackground(Color color) {
        this.color = color;
    }

    public void draw() {
        System.out.println("Solid background with color " + color.toString());
    }
}

