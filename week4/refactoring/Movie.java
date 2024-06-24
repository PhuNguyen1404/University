package week4.refactoring;

class Movie {
    // Constants representing movie price codes.
    public static final int CHILDRENS = 2;
    public static final int REGULAR = 0;
    public static final int NEW_RELEASE = 1;

    // Movie attributes.
    private String title;
    private PriceStrategy priceStrategy;

    // Constructor to initialize Movie with a title and price code.
    public Movie(String title, int priceCode) {
        this.title = title;
        setPriceCode(priceCode);  // Set the initial price code.
    }

    // Getter method to retrieve the current price code.
    public int getPriceCode() {
        return priceStrategy.getPriceCode();
    }

    // Setter method to set the price code and determine the corresponding PriceStrategy.
    public void setPriceCode(int priceCode) {
        switch (priceCode) {
            case REGULAR:
                priceStrategy = new RegularPrice();  // Set RegularPrice strategy for regular movies.
                break;
            case NEW_RELEASE:
                priceStrategy = new NewReleasePrice();  // Set NewReleasePrice strategy for new release movies.
                break;
            case CHILDRENS:
                priceStrategy = new ChildrensPrice();  // Set ChildrensPrice strategy for children's movies.
                break;
            default:
                throw new IllegalArgumentException("Invalid price code");  // Handle invalid price codes.
        }
    }

    // Getter method to retrieve the movie title.
    public String getTitle() {
        return title;
    }

    // Methods to delegate calculations to the current PriceStrategy.
    public double calculateAmount(int daysRented) {
        return priceStrategy.calculateAmount(daysRented);
    }

    public int calculateFrequentRenterPoints(int daysRented) {
        return priceStrategy.calculateFrequentRenterPoints(daysRented);
    }
}
