package week5;

public class TeamLeaderDecorator extends EmployeeDecorator {
    public TeamLeaderDecorator(Employee employee) {
        super(employee);
    }

    @Override
    public void doTask() {
        super.doTask();
        motivate();
        monitor();
    }

    public void motivate() {
        System.out.println(employee + " is motivating his members.");
    }

    public void monitor() {
        System.out.println(employee + " is monitoring his members.");
    }
}