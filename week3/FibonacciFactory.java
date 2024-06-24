// Concrete Factory for creating Fibonacci instances
class FibonacciFactory implements AlgorithmFactory {
    public Algorithm createnonRecursive() {
        return new LazyAlgorithm(new Fibonacci());
    }

    public Algorithm createRecursive() {
        return new LazyAlgorithm(new FibonacciRecursive());
    }
}

