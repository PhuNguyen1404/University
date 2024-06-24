// Implement the PadovanRecursive class
class PadovanRecursive implements Algorithm {
    public String getName() {
        return "Padovan Recursive";
    }

    public double getVal(int n) {
        if (n == 0 || n == 1 || n == 2) {
            return 1;
        } else {
            return getVal(n - 2) + getVal(n - 3);
        }
    }
}
