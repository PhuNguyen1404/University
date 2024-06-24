package week4.refactoring;

public class HTMLStatement {
    // Method to generate an HTML statement of the customer's rentals and charges.
    public static String generateHTMLStatement(Customer customer) {
        StringBuilder htmlStatement = new StringBuilder("<html><body>\n");
        htmlStatement.append("<h1>Rental Record for ").append(customer.getName()).append("</h1>\n");
        
        // Loop through each rental in the list.
        for (Rental each : customer.getRentals()) {
            double thisAmount = each.getMovie().calculateAmount(each.getDaysRented());
            htmlStatement.append("<p>").append(each.getMovie().getTitle()).append(": ").append(String.valueOf(thisAmount)).append("</p>\n");
        }

        // Append total rental cost and frequent renter points to the HTML statement.
        htmlStatement.append("<p>Amount owed is ").append(String.valueOf(customer.getTotalAmount())).append("</p>\n");
        htmlStatement.append("<p>You earned ").append(String.valueOf(customer.getFrequentRenterPoints())).append(" frequent renter points</p>\n");
        
        htmlStatement.append("</body></html>");
        return htmlStatement.toString();  // Return the generated HTML statement.
    }
}