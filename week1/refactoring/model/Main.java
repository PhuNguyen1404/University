
public class Main {
    public static void main(String[] args) {
        // Create movies
        Movie rogueOne = new Movie("Rogue One", Movie.NEW_RELEASE);
        Movie frozen = new Movie("Frozen", Movie.CHILDRENS);
        Movie starWarsIII = new Movie("Star Wars III", Movie.REGULAR);

        // Create rentals
        Rental rental1 = new Rental(rogueOne, 5);
        Rental rental2 = new Rental(frozen, 7);
        Rental rental3 = new Rental(starWarsIII, 4);

        // Create customer
        Customer customer = new Customer("NgocPhu");

        // Add rentals to customer
        customer.addRental(rental1);
        customer.addRental(rental2);
        customer.addRental(rental3);

        // Display information about the client
        System.out.println(customer.statement());
    }
}
