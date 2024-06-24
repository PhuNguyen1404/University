namespace day01;
using day01.models;

class Program
{
    static void Main(string[] args)
    {
        Movie[] movies = {
            new Movie("Rogue One", Movie.NEW_RELEASE),
            new Movie("Frozen", Movie.CHILDRENS),
            new Movie("Star Wars III", Movie.REGULAR)
        };

        Rental[] rentals = {
            new Rental(movies[0], 5),
            new Rental(movies[1], 7),
            new Rental(movies[2], 4)
        };

        Customer c = new Customer("John");
        foreach (Rental r in rentals)
        {
            c.addRental(r);
        }

        String ret = c.statement();
        Console.WriteLine(ret);
    }
}

