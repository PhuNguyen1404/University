package Final;

import org.junit.Test;
import static org.junit.Assert.*;

public class FactorialCalculatorTest {

    @Test
    public void testCalculateFactorialForZero() {
        assertEquals(1, FactorialCalculator.calculateFactorial(0));
    }

    @Test
    public void testCalculateFactorialForOne() {
        assertEquals(1, FactorialCalculator.calculateFactorial(1));
    }

    @Test
    public void testCalculateFactorialForPositiveNumber() {
        assertEquals(120, FactorialCalculator.calculateFactorial(5));
    }

    @Test
    public void testCalculateFactorialForLargeNumber() {
        assertEquals(3628800, FactorialCalculator.calculateFactorial(10));
    }

    @Test
    public void testCalculateFactorialForNegativeNumber() {
        try {
            FactorialCalculator.calculateFactorial(-5);
            fail("Expected IllegalArgumentException was not thrown");
        } catch (IllegalArgumentException e) {
            assertEquals("Input must be a non-negative integer", e.getMessage());
        }
    }

    @Test
    public void testCalculateFactorialForMaxInteger() {
        assertEquals(0, FactorialCalculator.calculateFactorial(Integer.MAX_VALUE));
    }
}
