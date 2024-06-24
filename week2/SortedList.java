import java.util.Arrays;
import java.util.Random;
import java.util.Scanner;

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

    public void selectionSort() {
        int n = numbers.length;
        for (int i = 0; i < n - 1; i++) {
            int minIndex = i;
            for (int j = i + 1; j < n; j++) {
                if (numbers[j] < numbers[minIndex]) {
                    minIndex = j;
                }
            }
            // Swap the found minimum element with the first element
            int temp = numbers[minIndex];
            numbers[minIndex] = numbers[i];
            numbers[i] = temp;
        }
    }

    public void bubbleSort() {
        for (int i = 0; i < numbers.length - 1; i++) {
            for (int j = 0; j < numbers.length - i - 1; j++) {
                // Swap the found minimum element with the first element
                if (numbers[j] > numbers[j + 1]) {
                    int temp = numbers[j];
                    numbers[j] = numbers[j + 1];
                    numbers[j + 1] = temp;
                }
            }
        }
    }

    public void print() {
        System.out.println(Arrays.toString(numbers));
    }

    // Additional method to print the unsorted array
    public void printUnsorted() {
        System.out.println("Unsorted array: " + Arrays.toString(numbers));
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        SortedList sortedList = new SortedList(25);

        // Print the unsorted array before sorting
        sortedList.printUnsorted();

        System.out.println("Choose a sort algorithm:");
        System.out.println("1. Selection Sort");
        System.out.println("2. Bubble Sort");
        int choice = scanner.nextInt();

        switch (choice) {
            case 1:
                sortedList.selectionSort();
                break;
            case 2:
                sortedList.bubbleSort();
                break;
            default:
                System.out.println("Invalid choice");
                break;
        }

        // Print the unsorted array
        sortedList.print();

        scanner.close();
    }
}
