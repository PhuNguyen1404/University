import java.util.Arrays;
import java.util.Random;

public class SortedList {
    private int[] numbers;

    public SortedList(int size) {
        this.numbers = generateRandomArray(size);
    }

    // Generates random array of numbers 
    private int[] generateRandomArray(int size) {
        int[] array = new int[size];
        Random random = new Random();
        for (int i = 0; i < size; i++) {
            array[i] = random.nextInt(100);
        }
        return array;
    }

    public void sort(SortStrategy sortStrategy) {
        sortStrategy.sort(numbers);
    }

    public void print() {
        System.out.println(Arrays.toString(numbers));
    }
}
