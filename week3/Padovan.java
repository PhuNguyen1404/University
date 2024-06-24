// Implementation of Padovan class
class Padovan implements Algorithm {

    public String getName() {
        return "Padovan";
    }

    public double getVal(int n) {
        if (n <= 2) {
            return 1;
        }

        double[] padovanArray = new double[n + 1];
        padovanArray[0] = 1;
        padovanArray[1] = 1;
        padovanArray[2] = 1;

        for (int i = 3; i <= n; i++) {
            padovanArray[i] = padovanArray[i - 2] + padovanArray[i - 3];
        }

        return padovanArray[n];
    }
}


