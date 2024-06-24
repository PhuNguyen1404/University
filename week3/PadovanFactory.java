// Concrete Factory for creating Padovan instances
class PadovanFactory implements AlgorithmFactory {
    public Algorithm createnonRecursive() {
        return new LazyAlgorithm(new Padovan());
    }

    public Algorithm createRecursive() {
        return new LazyAlgorithm(new PadovanRecursive());
    }
}
