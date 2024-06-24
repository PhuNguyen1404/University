// Implementation of Fibonacci class
class Fibonacci implements Algorithm {
    public String getName() {
        return "Fibonacci";
    }

    public double getVal(int n) {
        if (n == 0 || n == 1) {
            return 1;
        } else {
            double[] fibValues = new double[n + 1];
            fibValues[0] = 1;
            fibValues[1] = 1;

            for (int i = 2; i <= n; i++) {
                fibValues[i] = fibValues[i - 1] + fibValues[i - 2];
            }

            return fibValues[n];
        }
    }
}

