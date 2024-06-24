using System.Collections;

namespace day01.models
{
    public class Customer
    {
        private String _name;
        private ArrayList _rentals = new ArrayList();

        public Customer(String name) {
            _name = name;
        }

        public void AddRental(Rental rental) {
            _rentals.Add(rental);
        }

        public String getName() {
            return _name;
        }

        public String GenerateStatement() {
            double totalAmount = 0;
            int frequentRenterPoints = 0;
            var rentals = _rentals.GetEnumerator();
            String result = "Rental Record for " + getName() + "\n";
            while (rentals.MoveNext()) {
                double thisAmount = 0;
                Rental each = (Rental)rentals.Current;
                switch (each.getMovie().getPriceCode()) {
                    case Movie.REGULAR:
                        thisAmount += 2;
                        //thisAmount += 3;
                        if (each.getDaysRented() > 2) {
                            thisAmount += (each.getDaysRented() - 2) * 1.5;
                        }
                        break;
                    case Movie.NEW_RELEASE:
                        thisAmount += each.getDaysRented() * 3;
                        break;
                    case Movie.CHILDRENS:
                        thisAmount += 1.5;
                        if (each.getDaysRented() > 3)
                            thisAmount += (each.getDaysRented() - 3) * 1.5;
                        break;
                }
                frequentRenterPoints++;
                if ((each.getMovie().getPriceCode() == Movie.NEW_RELEASE) && (each.getDaysRented() > 1))
                    frequentRenterPoints++;
                result += "\t" + each.getMovie().getTitle() + "\t" + thisAmount.ToString() + " \n";
                totalAmount += thisAmount;
            }
            result += "Amount owned is " + totalAmount.ToString() + "\n";
            result += "You earned " + frequentRenterPoints.ToString() + " frequent renter points";
            return result;
        }
    }
}

