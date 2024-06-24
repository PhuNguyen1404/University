package week4.refactoring;

interface PriceStrategy {
    int getPriceCode();
    double calculateAmount(int daysRented);
    int calculateFrequentRenterPoints(int daysRented);
}
