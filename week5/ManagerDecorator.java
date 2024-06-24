package week5;

public class ManagerDecorator extends EmployeeDecorator {
    public ManagerDecorator(Employee employee) {
        super(employee);
    }

    @Override
    public void doTask() {
        super.doTask();
        assignTask();
        manageProgress();
    }

    public void assignTask() {
        System.out.println(employee + " is assigning tasks.");
    }

    public void manageProgress() {
        System.out.println(employee + " is managing the progress.");
    }
}
