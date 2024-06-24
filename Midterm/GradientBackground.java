package Midterm;
import java.awt.*;

public class GradientBackground implements Background {
    private Color startColor;
    private Color endColor;

    public GradientBackground(Color startColor, Color endColor) {
        this.startColor = startColor;
        this.endColor = endColor;
    }

    public void draw() {
        System.out.println("Gradient background from " + startColor.toString() + " to " + endColor.toString());
    }
    
}