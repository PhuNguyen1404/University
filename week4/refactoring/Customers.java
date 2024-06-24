package week4.refactoring;

import java.util.Vector;

class Customer {
    private String name;
    private Vector<Rental> rentals;

    // Constructor initializes Customer with a name and an empty list of rentals.
    public Customer(String name) {
        this.name = name;
        this.rentals = new Vector<>();
    }

    // Method to add a rental to the customer's list.
    public void addRental(Rental rental) {
        rentals.add(rental);
    }

    // Getter method to retrieve the customer's name.
    public String getName() {
        return name;
    }
    /* 
    // Method to generate a statement of the customer's rentals and charges.
    public String statement() {
        double totalAmount = 0;  // Total rental cost.
        int frequentRenterPoints = 0;  // Total frequent renter points.
        String result = "Rental Record for " + getName() + "\n";  // Initialize the result string.

        // Loop through each rental in the list.
        for (Rental each : rentals) {
            double thisAmount = each.getMovie().calculateAmount(each.getDaysRented());  // Calculate rental cost.
            frequentRenterPoints += each.getMovie().calculateFrequentRenterPoints(each.getDaysRented());  // Calculate frequent renter points.
            result += "\t" + each.getMovie().getTitle() + "\t" + String.valueOf(thisAmount) + " \n";  // Append rental details to the result.
            totalAmount += thisAmount;  // Update total rental cost.
        }

        // Append total rental cost and frequent renter points to the result.
        result += "Amount owed is " + String.valueOf(totalAmount) + "\n";
        result += "You earned " + String.valueOf(frequentRenterPoints) + " frequent renter points";

        return result;  // Return the generated statement.
    }
    */
    
    // Method to get the total amount for all rentals.
    public double getTotalAmount() {
        double totalAmount = 0;
        for (Rental rental : rentals) {
            totalAmount += rental.getMovie().calculateAmount(rental.getDaysRented());
        }
        return totalAmount;
    }

    // Method to get the total frequent renter points for all rentals.
    public int getFrequentRenterPoints() {
        int frequentRenterPoints = 0;
        for (Rental rental : rentals) {
            frequentRenterPoints += rental.getMovie().calculateFrequentRenterPoints(rental.getDaysRented());
        }
        return frequentRenterPoints;
    }

    // Method to get the list of rentals.
    public Vector<Rental> getRentals() {
        return rentals;
    }
}