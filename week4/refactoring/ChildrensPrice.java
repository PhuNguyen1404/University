package week4.refactoring;

class ChildrensPrice implements PriceStrategy {
    @Override
    public int getPriceCode() {
        return Movie.CHILDRENS;
    }

    // Method calculates the rental amount for a given number of days
    @Override
    public double calculateAmount(int daysRented) {
        double amount = 1.5;
        if (daysRented > 3) {
            amount += (daysRented - 3) * 1.5;
        }
        return amount;
    }

    // Method calculates the frequent renter points for a given number of days
    @Override
    public int calculateFrequentRenterPoints(int daysRented) {
        return 1;
    }
}
