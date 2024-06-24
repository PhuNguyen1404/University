package week4.refactoring;

class NewReleasePrice implements PriceStrategy {
    @Override
    public int getPriceCode() {
        return Movie.NEW_RELEASE;
    }

    @Override
    public double calculateAmount(int daysRented) {
        return daysRented * 3;
    }

    @Override
    public int calculateFrequentRenterPoints(int daysRented) {
        return (daysRented > 1) ? 2 : 1;
    }
}
