import java.util.Scanner;

// Enum to represent different algorithm types
enum AlgorithmType {
    FIBONACCI_NON_RECURSIVE,
    FIBONACCI_RECURSIVE,
    PADOVAN_NON_RECURSIVE,
    PADOVAN_RECURSIVE
}

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // Display available algorithm choices to the user using Enums
        System.out.println("Choose an algorithm:");
        System.out.println("1. Fibonacci Non-Recursive");
        System.out.println("2. Fibonacci Recursive");
        System.out.println("3. Padovan Non-Recursive");
        System.out.println("4. Padovan Recursive");

        int choice = scanner.nextInt();

        // Initialize AlgorithmType variable for the selected algorithm.
        AlgorithmType algorithmType;

        // Map the user's choice to the corresponding AlgorithmType using Enums
        switch (choice) {
            case 1:
                algorithmType = AlgorithmType.FIBONACCI_NON_RECURSIVE;
                break;
            case 2:
                algorithmType = AlgorithmType.FIBONACCI_RECURSIVE;
                break;
            case 3:
                algorithmType = AlgorithmType.PADOVAN_NON_RECURSIVE;
                break;
            case 4:
                algorithmType = AlgorithmType.PADOVAN_RECURSIVE;
                break;
            default:
                System.out.println("Invalid choice");
                return;
        }

        // Create an AlgorithmManager with default factories for demonstration purposes.
        AlgorithmManager algorithmManager = new AlgorithmManager(new FibonacciFactory(), new PadovanFactory());

        // Retrieve the desired Algorithm instance from the AlgorithmManager based on the selected AlgorithmType.
        Algorithm algorithm;
        switch (algorithmType) {
            case FIBONACCI_NON_RECURSIVE:
                algorithm = algorithmManager.getFibonacciNonRecursive();
                break;
            case FIBONACCI_RECURSIVE:
                algorithm = algorithmManager.getFibonacciRecursive();
                break;
            case PADOVAN_NON_RECURSIVE:
                algorithm = algorithmManager.getPadovanNonRecursive();
                break;
            case PADOVAN_RECURSIVE:
                algorithm = algorithmManager.getPadovanRecursive();
                break;
            default:
                System.out.println("Invalid choice");
                return;
        }

        // Display the results of the chosen algorithm for the first 10 values.
        System.out.println("Results:");

        for (int i = 0; i < 10; i++) {
            System.out.println(algorithm.getName() + " at " + i + ": " + algorithm.getVal(i));
        }
    }
}
