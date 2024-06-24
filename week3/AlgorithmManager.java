// The AlgorithmManager class is responsible for managing different algorithm factories and providing instances of algorithms based on user requests.
public class AlgorithmManager {

    // AlgorithmFactory instances for Fibonacci and Padovan algorithms.
    private AlgorithmFactory fibonacciFactory;
    private AlgorithmFactory padovanFactory;

    // Constructor to initialize AlgorithmManager with AlgorithmFactory instances.
    public AlgorithmManager(AlgorithmFactory fibonacciFactory, AlgorithmFactory padovanFactory) {
        this.fibonacciFactory = fibonacciFactory;
        this.padovanFactory = padovanFactory;
    }

    // Method to get a non-recursive Fibonacci algorithm instance from the associated factory.
    public Algorithm getFibonacciNonRecursive() {
        return fibonacciFactory.createnonRecursive();
    }

    // Method to get a recursive Fibonacci algorithm instance from the associated factory.
    public Algorithm getFibonacciRecursive() {
        return fibonacciFactory.createRecursive();
    }

    // Method to get a non-recursive Padovan algorithm instance from the associated factory.
    public Algorithm getPadovanNonRecursive() {
        return padovanFactory.createnonRecursive();
    }

    // Method to get a recursive Padovan algorithm instance from the associated factory.
    public Algorithm getPadovanRecursive() {
        return padovanFactory.createRecursive();
    }
}
