import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        SortedList sortedList = new SortedList(25);

        // Print the unsorted array before sorting
        sortedList.print();

        System.out.println("Choose a sort algorithm:");
        System.out.println("1. Selection Sort");
        System.out.println("2. Bubble Sort");
        int choice = scanner.nextInt();

        SortStrategy sortStrategy;
        switch (choice) {
            case 1:
                sortStrategy = new SelectionSort();
                break;
            case 2:
                sortStrategy = new BubbleSort();
                break;
            default:
                System.out.println("Invalid choice");
                return;
        }

        // Perform sorting using the specified strategy
        sortedList.sort(sortStrategy);

        // Print the sorted array
        sortedList.print();

        scanner.close();
    }
}
