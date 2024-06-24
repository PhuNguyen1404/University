// Implement the FibonacciRecursive class
class FibonacciRecursive implements Algorithm {
    public String getName() {
        return "Fibonacci Recursive";
    }

    public double getVal(int n) {
        if (n == 0 || n == 1) {
            return 1;
        } else {
            return getVal(n - 1) + getVal(n - 2);
        }
    }
}
