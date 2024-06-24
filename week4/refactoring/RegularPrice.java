package week4.refactoring;

class RegularPrice implements PriceStrategy {
    @Override
    public int getPriceCode() {
        return Movie.REGULAR;
    }

    // Method calculates the rental amount for a given number of days
    @Override
    public double calculateAmount(int daysRented) {
        double amount = 2;
        if (daysRented > 2) {
            amount += (daysRented - 2) * 1.5;
        }
        return amount;
    }

    // Method calculates the frequent renter points for a given number of days
    @Override
    public int calculateFrequentRenterPoints(int daysRented) {
        return 1;
    }
}
